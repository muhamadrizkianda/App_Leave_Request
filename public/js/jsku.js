let number = 1;
let currentCode = 65;
let totalBonus = 0;

$(document).ready(function () {
    addRow();
}) 
 
$('#my_submit_button').click(function(){
    $(this).parents('form').submit();
});

// tombol tambah
function addRow() {
    let huruf = String.fromCharCode(currentCode);
    let tbody = '<tr>';
    tbody += `<td>${number}</td>`;
    tbody += `<td><input type="date" name="dari_tanggal[]" class="form-control" value="{{ date('Yyy-mm-dd', strtotime(Carbon\Carbon::today()->toDateString())) }}"  /> </td>`;
    tbody += `<td><input type="date" name="sampai_tanggal[]" class="form-control" value="{{ date('Yyy-mm-dd', strtotime(Carbon\Carbon::today()->toDateString())) }}"  /> </td>`;
    tbody += '<td><input type="text" name="jenis_cuti[]" class="form-control"  /></td>';
    tbody += '<td width="5%"><a class="btn btn-danger hapus">X</a></td>';
   
    tbody += '</tr>';
    currentCode++;
    number++;
    $('tbody').append(tbody);
};

// tombol Hapus
$(document).on('click', 'a', function (event) {
    number = 1;
    currentCode = 65;
    let persen = 0;
    $(this).parent().parent().remove();
    $('tbody tr').each(function () {
        let huruf = String.fromCharCode(currentCode);
        let value = $(this).find('td:nth-child(3) input').val();
        if (value != '') {
            persen += parseInt(value);
        }
        $(this).find('td:nth-child(1)').html(number);
        $(this).find('td:nth-child(2) input').val(`tanggal Cuti ${huruf}`);
        number++;
        currentCode++;
    })
    $('span').html(persen);
})

// dari_tanggal
$(document).on("keydown", ".dari_tanggal",".sampai_tanggal",".jenis_cuti" ,function(event) {
      if(event.which == 13) {
        let currentPersen = $(this).val();

        if (currentPersen != '') {
            let dari_tanggal = 0;
            $('tbody tr').each(function () {
                let value = $(this).find('td:nth-child(3) input').val();
                if (value != '') {
                    dari_tanggal += parseInt(value);
                }
            })
            // sampai_tanggal
            let  = dari_tanggal = sampai_tanggal;
            let fBonus = toDateString(dari_tanggal);
            $(this).parent().parent().find('td:nth-child(4) input').val(fBonus);

            if (date > toDateString) {
                alert('Masukan tanggal');
                dari_tanggal -= currentPersen;
                $(this).parent().parent().find('td:nth-child(4) input').val('');
                $(this).val('');
            }
            $('span').html(dari_tanggal);
        }
      }  
});
// $(document).on('keyup', '.persen', delay(function (e) {
//     e.PreventDefault();
    
// }, 1500))

//input bonus mengubah format rupiah
$('#inputBonus').on('keyup', function () {
    let value = $(this).val();
    $(this).val(formatRupiah(value, 'Rp. '));
    bonus = $('#inputBonus').val().replace('Rp. ', '');
    var angka = bonus.split('.');
    var hitung = angka.length;
    var a = 0;
    let fangka = '';
    for (var i = 0; i < hitung; i++) {
        fangka += angka[a];
        a++;
    }
    totalBonus = fangka;
});

// function delay
function delay(fn, ms) {
    let timer = 0
    return function (...args) {
        clearTimeout(timer)
        timer = setTimeout(fn.bind(this, ...args), ms || 0)
    }
}


function formatRupiah(angka, prefix) {
    var number_string = angka.toString().replace(/[^,\d]/g, ''),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}


