<div class="m-auto w-1/2 mb-4" >
    <h3 class="text-lg text-gray-200 mb-3">Create Article</h3>
    <form wire:submit="save">
        <div class="mb-3">
            <label for="article-title" class="block">Title</label>
            <input 
                type="text" 
                class="p-2 w-full border rounded-md bg-gray-700 text-white" 
                wire:model="form.title"
            >
            <div>
                @error('title')<span class="text-red-600">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="article-content" class="block">Content</label>
            <textarea 
                id="article-content" 
                class="p-2 w-full border rounded-md bg-gray-700 text-white" 
                wire:model="form.content"
            ></textarea>
            <div>
                @error('content')<span class="text-red-600">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="article-photo" class="block">
                Photo
            </label>
            <div class="flex items-center">
                <input type="file"
                    wire:model="form.photo"
                >
                <div>
                    @if ($form->photo)
                        <img src="{{ $form->photo->temporaryUrl() }}" alt="" class="w-1/2">
                    @endif
                </div>
            </div>
            <div>
                @error('photo')<span class="text-red-600">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="mb-3">
            <label class="flex items-center">
                <input type="checkbox" name="published" 
                    class="mr-2" 
                    wire:model.boolean="form.published"
                >
                Published
            </label>
        </div>
        <div class="mb-3">
            <div>
                <div class="mb-2">Notification Options</div>
                <div class="flex gap-6 mb-3">
                    <label class="flex items-center">
                        <input type="radio" class="mr-2" value="true" wire:model.boolean="form.allowNotifications"
                        >
                        Yes
                    </label>
                    <label class="flex items-center">
                        <input type="radio" class="mr-2" value="false" wire:model.boolean="form.allowNotifications"
                        >
                        No
                    </label>
                </div>
                <div x-show="$wire.form.allowNotifications">
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2" value="email" wire:model="form.notifications"
                        >
                        Email
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2" value="sms" wire:model="form.notifications"
                        >
                        SMS
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2" value="push" wire:model="form.notifications"
                        >
                        Push
                    </label>
                </div>
            </div>
        </div>
        <div class="mb-3">
        <button
                class="text-gray-200 p-2 bg-blue-700 rounded-sm disabled:opacity-75 disabled:bg-blue-300"
                type="submit"
                wire:dirty.class="hover:bg-blue-900"
                wire:dirty.remove.attr="disabled"
                disabled
            >
                Save
            </button>
        </div>
    </form>
</div>
