<select name="categoryFilter" wire:model="posts.category_level_id" class="form-select" aria-label="Default select example">
    <option selected="true" disabled="disabled">Выберите категорию </option>
    @foreach($categoryLevel as $categoryLevel)
        <option value="{{$categoryLevel->category_level_id}}">{{$categoryLevel->categoryLevel}}</option>
    @endforeach
</select>
