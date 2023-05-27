<x-layout title="Manage comments">
    <div class="container py-4">
        <h1>Comments</h1>
        <x-flash-message />
        <table class="table mt-4">
            <thead>
                <tr>
                    <th width="20">No</th>
                    <th>Author</th>
                    <th>Comment</th>
                    <th width="130">Commented on</th>
                    <th width="250">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $updated = session('updated')
                @endphp
                @foreach ($comments as $index => $comment)
                    <tr class="{{ $updated != $comment->id ? "" : ($comment->approved ? 'table-success' : 'table-danger')}}">
                        <td>{{ $comments->firstItem() + $index }}</td>
                        <td>{{ $comment->user->username }}</td>
                        <td>{{ $comment->body }}</td>
                        <td>
                            <img src="{{ $comment->image->fileUrl() }}" width="100" />
                        </td>
                        <td>
                            <x-form method="PUT" action="{{ route('comments.update', $comment->id) }}" style="display: inline">
                                <input type="hidden" name="approved" value="{{ $comment->approved ? 0 : 1}}">
                                <button type="submit" class="btn btn-sm btn-outline-success">
                                    {{ $comment->approved ? "Unapprove" : "Approve" }}
                                </button>
                            </x-form>
                            <a href="#" class="btn btn-sm btn-outline-primary">Reply</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $comments->links() }}
    </div>

    @push('scripts')
    <script>
        setTimeout(() => {
            const rows = document.querySelectorAll("tr[class^='table-']");
            for (let index = 0; index < rows.length; index++) {
                rows[index].removeAttribute('class');
            }
        }, 1500);
    </script>
    @endpush
</x-layout>