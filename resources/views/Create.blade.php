@include('header')

<body>
    
    <main class ="CreateMain">
        <div class="AddProduct">
            <span><b>Добавить товар в Кондитерскую </b></span>
        </div>
        
        <form  class= "WindowForm"action="{{route('Create.product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="CreateForm">
                <span>Название торта</span>
                <input type="text" name="Name_cake">
            </label>
            <label class="CreateForm">
                <span>Картинка</span>
                <input type="file" name="Image">
            </label >
            <label class="CreateForm">
                <span>Цена</span>
                <input type="text" name ="Price">
            </label>
            <label class="CreateForm">
                <span>Описание</span>
                <textarea name="Description" class="Description"> </textarea>
            </label>
            <label class="CreateFormChoose">
                <span>Категория</span>
                <select class="ChooseProduct" name="category_id"> 
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->type_cake }}</option>
                @endforeach
                </select> 
                
            </leabel>
            @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <input  class="SendProduct" value="Добавить"type="submit">
        </form>

    </main>
</body>

@include('footer')