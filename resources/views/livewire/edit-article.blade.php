<div class="m-auto w-1/2 mb-4" >
    <h3 class="text-lg text-gray-400 mb-3">Edit Article</h3>
    <form wire:submit="save">
        <div class="mb-3">
            <label for="article-title" class="block" wire:dirty.class="text-orange-400" wire:target="form.title">
                Title<span wire:dirty wire:target="form.title">*</span>
            </label>
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
            <label for="article-photo" class="block">
                Photo
            </label>
            <div class="flex items-center">
                <input type="file"
                    wire:model="form.photo"
                >
                <div class="text-center">
                    @if ($form->photo)
                        <img src="{{ $form->photo->temporaryUrl() }}" alt="" class="w-1/2 inline">
                    @elseif ($form->photo_path)
                        <img src="{{ Storage::url($form->photo_path) }}" alt="" class="w-1/2 inline">
                        <div class="mt-2">
                            <button
                                type="button"
                                class="text-gray-200 p-1 bg-blue-700 rounded-sm hover:bg-blue-900"
                                wire:click="downloadPhoto"
                            >
                                Download
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div>
                @error('photo')<span class="text-red-600">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="article-content" class="block"wire:dirty.class="text-orange-400" wire:target="form.content">
                Content<span wire:dirty wire:target="form.content">*</span>
            </label>
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
            <label class="flex items-center" wire:dirty.class="text-orange-400" wire:target="form.published">
                <input type="checkbox" name="published" 
                    class="mr-2" 
                    wire:model.boolean="form.published"
                >
                Published<span wire:dirty wire:target="form.published">*</span>
            </label>
        </div>
        <div class="mb-3">
            <div>
                <div class="mb-2" wire:dirty.class="text-orange-400" wire:target="form.notifications">
                    Notification Options<span wire:dirty wire:target="form.notifications">*</span>
                </div>
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
                class="text-gray-200 p-2 bg-blue-700 rounded-sm hover:bg-blue-900"
                type="submit"
            >
                Save
            </button>
        </div>
    </form>
</div>
