<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Material</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Create Material</h1>
    <form id="materialForm" class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <label for="lecture_id" class="block text-sm font-medium text-gray-700">Select Lecture</label>
            <select id="lecture_id" name="lecture_id" required class="form-select block w-full mt-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Select Lecture</option>
                @foreach($lectures as $lecture)
                    <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                @endforeach
            </select>
        </div>
        <div id="editorjs" class="border border-gray-300 rounded-md mb-4" style="min-height: 300px;"></div>
        <button type="button" id="save" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 rounded-md">Save</button>
    </form>
</div>

<script>
    const editor = new EditorJS({
        holder: 'editorjs',
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
            // Prepare the content in the required format
            const content = {
                time: Math.floor(Date.now() / 1000), // Current timestamp in seconds
                blocks: outputData.blocks, // Directly use the blocks from the output
                version: '2.22.2', // Fixed version
            };

            const lectureId = document.getElementById('lecture_id').value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('{{ route("materials.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, // Include CSRF token
                },
                // IMPORTANT: Directly stringify the content object to prevent double encoding
                body: JSON.stringify({
                    content: content, // Content is now an object, not a string
                    lecture_id: lectureId,
                    type: 'blog', // Adjust type as necessary
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
                    window.location.href = '{{ route("materials.index") }}'; // Redirect on success
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


