<x-layout title="Manage comments">
    <div class="container py-4">
        <h1>Comments</h1>
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
                @foreach ($comments as $index => $comment)
                    <tr>
                        <td>{{ $comments->firstItem() + $index }}</td>
                        <td>{{ $comment->user->username }}</td>
                        <td>{{ $comment->body }}</td>
                        <td>
                            <img src="{{ $comment->image->fileUrl() }}" width="100" />
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-success">Approve</a>
                            <a href="#" class="btn btn-sm btn-outline-primary">Reply</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $comments->links() }}
    </div>
</x-layout>