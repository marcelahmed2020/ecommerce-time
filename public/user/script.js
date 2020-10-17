$(document).ready(function () {
    $('#id_size').change(function () {
        var size = $(this).val();

        $.ajax({
             type: 'get',
             url: '/get/price',
             data:{size:size},
             success:function (res) {
                 var dat = JSON.parse(res);
                 console.log(dat);
                 var stock = $('#id_stock').html(dat['stock']);
                 var pricelist = $('.pricelist').html(`
                     <p>EUR  ${dat['EUR']}</p>
                     <p>BYR  ${dat['BYR']}</p>
                     <p>EGP  ${dat['EGP']}</p>
                   `);

                 var price = $('#getprice').html(dat['price'] + " L.E");
                  $('#updaprice').val(dat['price']);
                  $('#updasize').val(dat['size']);
                   $("#update_stock").attr("max", dat['stock']);
                   if (dat['stock'] == 0){
                       $("#add_t_cart").attr("disabled","disabled");
                   }

             },error:function () {
                       alert('ERROR');
             }

         });
    });
    $("#input_search").keyup(function(){
        // $("#input_search").css("background-color", "yellow");
        var input_search = $('#input_search').val();

        $.ajax({
            type:'get',
            url:'/search/products',
            data:{input_search:input_search},
            success:function(response){
                // alert(data);
                console.log(response[1]);
                var search_bar = $('#search_bar').css('display','block');

                // $.each(JSON.parse(data), function( k, v ) {
                //     search_bar.html("<a style='color: white' href='/product/details/"+v.id+"'> <small>"+v.title+"</small><small>"+v.desc+"</small></a><hr> <br>");
                //         console.log(v);
                // });
                // var  responsea = JSON.parse(response);
                // console.log(response);
                // $.each(dataEd, function(index, value){
                //     $('#search_bar').html(`<small>${value.title}</small> <hr>`);
                //         // console.log(`${index}: ${value.title}`);
                //
                // });
                // console.log(response['data']);
                // for(var i=0; i < response.length; i++){
                //     var id = response[i].id;
                //     var title = response[i].title;
                //     var desc = response[i].desc;
                //     console.log(response[i]);
                    // var tr_str = "<tr>" +
                    //     "<td align='center'>" + (i+1) + "</td>" +
                    //     "<td align='center'>" + username + "</td>" +
                    //     "<td align='center'>" + name + "</td>" +
                    //     "<td align='center'>" + email + "</td>" +
                    //     "</tr>";

                        // $('#search_bar').html(`<!--<small>${title}</small> <hr>-->`);

                    // $("#userTable tbody").append(tr_str);
                // }

            }

        });
        // aler();
      // console.log($('#input_search').val());
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".subscribe").click(function(e){
        e.preventDefault();
        var email = $("#email_subscribe").val();
        // alert(email);
        $.ajax({
            type:'POST',
            url: '/add/subscribe',
            data:{email:email},
            success:function (res) {
                     $('#text_subscribe').html(res);
            },error:function (data) {
                $('#text_subscribe').html("<span style='color:red'>Email Should Be Requird</span>");
            }
        });
    });

});
