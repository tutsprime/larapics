<x-layout :title="$user->username">
    <section class="jumbotron-author-image-background" @if($user->hasCoverImage()) style="background-image: url({{ $user->coverImageUrl() }});" @endif>
        <div class="jumbotron jumbotron-fluid py-4">
            <div class="container-fluid text-center">
                <h1 class="jumbotron-heading">{{ $user->username }}</h1>
                <p class="lead">{{ $user->inlineProfile() }}</p>
                <img src="{{ $user->profileImageUrl() }}" class="rounded-circle" alt="..." width="150">
                <div class="mt-3">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="#" title="Facebook"><img src="icons/facebook.svg" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" title="Twitter"><img src="icons/twitter.svg" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" title="Instagram"><img src="icons/instagram.svg" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" title="Website"><img src="icons/website.svg" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</x-layout>