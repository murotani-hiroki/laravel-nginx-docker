$(function() {
    // 初期表示（一覧検索）
    $.ajax({
        url: '/search',
        type: 'post',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {},
    }).done (function(data) {
        $('#trade-list-box').html(data);
    });

    // searchボタン
    $('#searchBtn').on('click', function() {
        // 一覧検索
        $.ajax({
            url: '/search',
            type: 'post',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { fromDate: $('#fromDate').val(), toDate: $('#toDate').val() },
        }).done (function(data) {
            // 正常の場合
            $('#trade-list-box').html(data);
        }).fail(function (data){
            // エラーの場合
            const errors = data.responseJSON.errors;
            const messages = Object.keys(errors).map(key => errors[key].join('\n'));
            alert(messages.join('\n'));
        });
    });

    // addボタン
    $('#addBtn').on('click', function() {
        // モーダルを新規表示
        $.ajax({
            url: '/new',
            type: 'post',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {},
        }).done (function(data) {
            $('body').append(data);
        });
    });

    // deleteボタン
    $('#deleteBtn').on('click', function() {
        var deleteIds = $('.deleteId:checked').map(function() {
            return $(this).val();
        }).get();
        $.ajax({
            url: '/delete',
            type: 'post',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { deleteIds: deleteIds }
        }).done (function(data) {
            if (data) {
                alert(data.message);
                $('#searchBtn').trigger('click');
            }
        });
    });

    // IDクリック
    $(document).on('click', '.tradeId', function(e) {
        e.preventDefault();
        // モーダルを編集表示
        $.ajax({
            url: '/edit',
            type: 'post',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { id: $(this).html() },
        }).done (function(data) {
            $('body').append(data);
        });
    });

    // モーダル saveボタン
    $(document).on('click', '#saveBtn', function() {
        $.ajax({
            url: '/save',
            type: 'post',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id: $('#tradeId').html(),
                tradingDate: $('#tradingDate').val(),
                settlementDate: $('#settlementDate').val(),
                currencyPairId: $('#currencyPair').val(),
                tradeType: $('[name="tradeType"]:checked').val(),
                quantity: $('#quantity').val(),
                entryPrice: $('#entryPrice').val(),
                exitPrice: $('#exitPrice').val(),
                stopLoss: $('#stopLoss').val(),
                profit: $('#profit').val(),
                comment: $('#comment').val()
            },
        }).done (function(data) {
            // 正常の場合
            alert(data.message);
            // モーダルを閉じる。
            $('#modalContainer').remove();
            $('#searchBtn').trigger('click');
        }).fail(function (data){
            // エラーの場合
            const errors = data.responseJSON.errors;
            const messages = Object.keys(errors).map(key => errors[key].join('\n'));
            alert(messages.join('\n'));
        });
    });

    // モーダル枠外のクリック
    $(document).on('click', '.overlay', function() {
        // モーダルを閉じる。
        $('#modalContainer').remove();
    });
})
