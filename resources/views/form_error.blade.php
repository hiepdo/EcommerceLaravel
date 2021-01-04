<style type="text/css">
    section.error
    {
        margin-top: 20px;
        background-color: bisque;
        font-size: 15px;
        width:350px;
    }
    li
    {
        list-style-type: none;
        padding-top:5px;
        color:red;
    }
    
</style>
@if ($errors->any())
    <section class="error">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="notification is-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif