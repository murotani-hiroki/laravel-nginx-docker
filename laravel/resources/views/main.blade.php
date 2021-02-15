<!DOCTYPE html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/fx.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/fx.js') }}"></script>
</head>
<body>
<div id="main">
    <h1 class="title">Laravel FX</h1>

    <div class="margin-left10" style="display:flex">
        <input type="text" id="fromDate"><span>〜</span><input type="text" id="toDate">
        <button id="searchBtn">search</button>
        <button id="addBtn">add</button>
        <button id="deleteBtn">delete</button>
    </div>

    <div class="margin-left10" style="margin-top: 10px;">
        <span style="">損益合計</span>
        <span>¥0</span>
        <span>$0</span>
    </div>

    <div id="trade-list-box">
    </div>
</div>

</body>
</html>
