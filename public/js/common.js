// 許可する画像の拡張子
var arrowedImgExt = ['jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG'];

// 画像DataURI化関数
$(function() {
    $(".data_uri_img").on("change", function() {
        var id = $(this).attr("id");
        if (this.files.length !== 0) {

            if ($.inArray(getExtension(this.files[0].name), arrowedImgExt) == -1) {

                alert('画像は' + arrowedImgExt.join(',') + 'で登録してください');
                $('#' + id).val('');
                $('#' + id).replaceWith($('#' + id).clone(true));
                $("#" + id + "_datauri").val("");
                $("#" + id + "_view").attr("src", "");
                $("#" + id + "_view").attr("style", "display:none;");
            } else {

                var reader  = new FileReader();
                reader.readAsDataURL(this.files[0]);
                reader.onload = function() {
                    $("#" + id + "_datauri").val(reader.result);
                    $("#" + id + "_view").attr("src", reader.result);
                    $("#" + id + "_view").attr("style", "display:block;");
                };
            }
        } else {
            $("#" + id + "_datauri").val("");
            $("#" + id + "_view").attr("src", "");
            $("#" + id + "_view").attr("style", "display:none;");
        }
    });
});

// ページ読み込み時(ブラウザバック含む)にサムネイルとDataUriを生成する関数
window.onpageshow = function(){
    $(".data_uri_img").each(function() {
        var id = $(this).attr("id");

        if (this.files.length !== 0 && $("#" + id + "_datauri").val() == "") {
            var reader  = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function() {
                $("#" + id + "_datauri").val(reader.result);
                $("#" + id + "_view").attr("src", reader.result);
                $("#" + id + "_view").attr("style", "display:block;");
            };

        } else if ($("#" + id + "_datauri").val() !== "") {
            $("#" + id + "_view").attr("src", $("#" + id + "_datauri").val());
            $("#" + id + "_view").attr("style", "display:block;");

        }
    });
}

function getExtension(filename)
{
    return filename.split('.').pop();
}

// questionモーダル表示
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// image拡大化モーダル表示
$(function() {
  $('img').on('click', function() {
    $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
    $('#enlargeImageModal').modal('show');
  });
});

// 日付選択フォーム動的切り替え
$(function() {
    $(".dateform").on("change", function() {
        var id  = $(this).attr("id");
        splitId = id.split('_');
        form    = splitId[0];
        part    = splitId[1];
        year    = $("#"+form+"_year").val();
        month   = $("#"+form+"_month").val();

        // 年が未選択になれば月日のセレクトボックスを空に
        if (year === '') {
            $('#'+form+"_month").children().remove();
            if ($("#"+form+"_day").length) {
                $('#'+form+"_day").children().remove();
            }
            return false;
        }

        // 月が未選択になれば日のセレクトボックスを空に
        if (month === '') {
            refreshSelectbox('#'+form+"_month", numberRange(1, 12), '未選択');

            if ($("#"+form+"_day").length){
                $('#'+form+"_day").children().remove();
            }
            return false;
        }

        // 月が選択されていれば
        if (month !== null) {
            // 日付フォームが存在しており、選択されたフォームが日付でなければ
            if ($("#"+form+"_day").length && part !== 'day') {
                var date = new Date(year, month, 0);
                refreshSelectbox('#'+form+"_day", numberRange(1, date.getDate()), '未選択');
            }
        }
    });
});

// セレクトボックス内のoptionを消して、dataで作成する
function refreshSelectbox(attr, data, firstText)
{
    $(attr).children().remove();

    if (firstText) {
        var option = $('<option />');
        option.val(null);
        option.text(firstText);
        $(attr).append(option);
    }

    $.each(data, function(value, text)
    {
        var option = $('<option />');
        option.val(value);
        option.text(text);
        $(attr).append(option);
    });
}

function numberRange(min, max)
{
    var numbers = {}
    for(var i = min; i <= max; i++) {
        numbers[i] = i;
    }
    return numbers;
}