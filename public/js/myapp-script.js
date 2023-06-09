$(document).ready(function () {
    // welcome.blade js

    $(".tab-links").on("click", "a", function (e) {
        e.preventDefault();
        let index = $(this).index() + 1;
        $(this).addClass("active").siblings().removeClass("active");

        $(`.tab-content .content:nth-child(${index})`)
            .removeClass("hide")
            .siblings()
            .addClass("hide");
    });

    // App-Configuration Form
    $(".submit-form").on("click", function (e) {
        e.preventDefault();
        let formdata = $(this).parents("#settings").serialize();
        $.ajax({
            url: "/get-config",
            method: "GET",
            data: formdata,
            success: function (res) {
                // console.log(res);
                Swal.fire(res, "", "success");
            },
        });
    });

    // Configuration.blade js

    $(".box_click").on("click", function (e) {
        let modeValue = $(this).data("mode");
        $('input[name="mode"]').val(modeValue);
        $(this).addClass("box_selected").siblings().removeClass("box_selected");

        $.ajax({
            url: `/${modeValue}`,
            method: "GET",
            success: function (result) {
                $(".box_content").html(result);
            },
        });
    });

    $("#follow_up_calls").on("change", function () {
        let index = $(this).children("option:selected").index();
        if (index == 1) {
            $(this).next().removeClass("hide");
        } else {
            $(this).next().addClass("hide");
        }
    });

    // Setting checkbox  values
    $('input[type="checkbox"]').on("click", function () {
        if ($(this).is(":checked")) {
            $(this).val(1);
        } else {
            $(this).val(0);
        }
    });
});
