<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lecture</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
</head>




<aside id="default-sidebar"
       class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
       aria-label="Sidebar">
    <div class="h-full w-30 px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{route('manage')}}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-2 w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                    </svg></a>

            </li>

        </ul>

    </div>
</aside>



<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Edit Lecture</h1>
        <form action="{{ route('update.lecture', $lecture->id) }}" method="POST" enctype="multipart/form-data" id="lectureForm">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="course_id" class="block text-sm font-medium text-gray-700">Course</label>
                <select name="course_id" id="course_id" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ $course->id == $lecture->course_id ? 'selected' : '' }}>{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Lecture Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $lecture->name) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">{{ old('description', $lecture->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <div id="editorjs" class="border border-gray-300 rounded-md p-4 bg-gray-50 min-h-[200px]"></div>
                <input type="hidden" id="content" name="content">
            </div>

            <div class="mb-4">
                <label for="audio_path" class="block text-sm font-medium text-gray-700">Audio (optional)</label>
                <input type="file" name="audio_path" id="audio_path" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
            </div>

            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium text-gray-700">Duration (in minutes)</label>
                <input type="number" name="duration" id="duration" value="{{ old('duration', $lecture->duration) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Update Lecture</button>
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
                    class: ImageTool,
                    config: {
                        endpoints: {
                            byFile: '/upload/image',  // Your Laravel route for image uploads
                            byUrl: '/upload/fetchUrl',  // Optional: if you want to fetch images by URL
                        },
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',  // CSRF token for security
                        }
                    }
                },
            },
        });

        document.addEventListener('DOMContentLoaded', () => {
            const contentField = document.getElementById('content');

            editor.isReady
                .then(() => {
                    // Load existing content into the editor if available
                    const savedContent = {!! json_encode($lecture->content) !!};
                    editor.render(JSON.parse(savedContent));
                })
                .catch((error) => {
                    console.error('Editor.js initialization failed: ', error);
                });

            document.getElementById('lectureForm').addEventListener('submit', (event) => {
                event.preventDefault();
                editor.save().then((outputData) => {
                    contentField.value = JSON.stringify(outputData);
                    event.target.submit();
                }).catch((error) => {
                    console.error('Saving failed: ', error);
                });
            });
        });
    </script>
</body>
</html>
