@foreach($categories as $sub_category)
    <tr>
        <td class="text-center">{{$sub_category->id}}</td>
        <td>{{str_repeat('-----', $level)}} {{$sub_category->name}}</td>
        <td class="text-center">
            <a class="btn bg-navy" href="{{route('categories.edit', $sub_category->id)}}">ویرایش</a>
            <div style="display: inline-block">
                <form method="post" action="/administrator/categories/{{$sub_category->id}}">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
            <a class="btn bg-maroon" href="{{route('categories.indexSetting', $sub_category->id)}}">تنظیمات</a>
        </td>
    </tr>
    @if(count($sub_category->childrenRecursive) > 0)
        @include('admin.partials.category_list', ['categories' => $sub_category->childrenRecursive, 'level' => $level+1])
    @endif
@endforeach
