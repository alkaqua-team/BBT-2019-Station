const host = " http://182.254.161.213/BBT-2019-Station/Backend/public/station"

function ticket(way, data, fn) {
    $.ajax({
        type: "POST",
        url: host + way,
        data: data,
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: fn,
    })
}

function show(method, fn) {
    $.ajax({
        type: "POST",
        url: host + method,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: fn,
    })
}