<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Material</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Edit Material</h1>
    <div id="editorjs" class="border border-gray-300 rounded-md" style="min-height: 300px;"></div>
    <button id="save" class="mt-4 w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 rounded-md">Save</button>
    <div id="success-message" class="mt-4 text-green-600 hidden">Material saved successfully!</div> <!-- Success message -->
</div>

<script>
    const editor = new EditorJS({
        holder: 'editorjs',
        data: {!! $material->content !!}, // Load the material content
        tools: {
            header: {
                class: Header,
                inlineToolbar: true,
            },
            list: {
                class: List,
                inlineToolbar: true,
            },
            image: {
                class: window.ImageTool,
                config: {
                    endpoints: {
                        byFile: '/upload/image', // Local endpoint for file upload
                        byUrl: '/fetch/url', // Optional: Endpoint for uploading by URL
                    },
                },
            },
        },
    });

    document.getElementById('save').addEventListener('click', function() {
        editor.save().then((outputData) => {
            const content = JSON.stringify(outputData);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Send the updated content to your update route
            fetch('{{ route("materials.update", $material->id) }}', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, // Include CSRF token
                },
                body: JSON.stringify({
                    content: content,
                    type: 'blog', // Adjust as necessary
                }),
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(errorData => {
                        throw new Error(errorData.message || 'Unknown error');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Show success message instead of redirecting
                    const successMessage = document.getElementById('success-message');
                    successMessage.classList.remove('hidden');
                } else {
                    console.error('Failed to save material:', data.message || 'Unknown error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }).catch(error => {
            console.error('Saving failed:', error);
        });
    });
</script>

</body>
</html>
