<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>BizIT</title>

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,600|Noto+Sans+JP:400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminSidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/2a4457fb97.js" crossorigin="anonymous"></script>

</head>

<body>

    @component('components.header')
    @endcomponent

    @component('components.adminSidebar')
    @endcomponent

    @yield('content')


<!-- vue.js -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script>

    new Vue({
        el: '#file-preview',
        data: {
            imageData: '' //画像格納用変数
        },
        methods: {
            onFileChange(e) {
                const files = e.target.files;

                if(files.length > 0) {

                    const file = files[0];
                    const reader = new FileReader();

                    reader.onload = (e) => {
                        this.imageData = e.target.result;

                    };
                    reader.readAsDataURL(file);
                }
            }
        }
    });

</script>
</body>
</html>