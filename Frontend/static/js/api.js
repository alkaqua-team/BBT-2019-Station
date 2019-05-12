const host = " http://182.254.161.213/BBT-2019-Station/Backend/public/station"

function ticket(way, data, fn) {
    $.ajax({
        type: "POST",
        url: host + way,
        data: data,
        dataType: 'JSON',
        xhrFields: {
            withCredentials: true
        },
        crossDomain: true,
        contentType: "application/x-www-form-urlencoded",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: fn,
    })
}

function show(method, fn) {
    $.ajax({
        type: "POST",
        url: host + method,
        xhrFields: {
            withCredentials: true
        },
        crossDomain: true,
        contentType: "application/x-www-form-urlencoded",
        heasers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: fn,
    })
}