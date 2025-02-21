<?php
if (isset($_SESSION['Status_Alert']) && isset($_SESSION['Type_Alert'])) {
    $alertColor = $_SESSION['Type_Alert'] === 'error' ? 'bg-red-500' : 'bg-green-500';

    echo "<script>
    document.addEventListener('DOMContentLoaded', function () {
        let alertBox = document.createElement('div');
        alertBox.className = 'animate-fade-in $alertColor fixed top-5 right-5 text-white px-4 py-2 rounded-lg shadow-md flex items-center gap-2 transition-opacity duration-500';
        alertBox.innerHTML = `
            <span>{$_SESSION['Status_Alert']}</span>
            <button onclick=\"this.parentElement.style.display='none'\" class=\"text-white font-bold\">&times;</button>
        `;
        document.getElementById('alert-respon').appendChild(alertBox);
        setTimeout(() => {
            alertBox.classList.add('opacity-0');
            setTimeout(() => alertBox.remove(), 500); // Hapus dari DOM setelah animasi selesai
        }, 3000);
    });</script>";

    unset($_SESSION['Status_Alert']);
    unset($_SESSION['Type_Alert']);
}
?>

<script>
    $(document).ready(function() {
        $("[data-modal-target]").click(function() {
            var target = $(this).attr("data-modal-target");
            $(target).removeClass(" quit-animation");
            setTimeout(() => {
                $(target).removeClass("hidden")
                $(target).addClass("animate-fade-in");
            }, 100);
        });

        $(".closeModal").click(function() {
            var target = $(this).attr("data-modal-close");
            $(target).removeClass("animate-fade-in");
            $(target).addClass("quit-animation");
            setTimeout(() => {
                $(target).addClass("hidden").removeClass("quit-animation");
            }, 300);
        });

        // $(".fixed").click(function(e) {
        //     if ($(e.target).hasClass("fixed")) {
        //         $(this).addClass("hidden");
        //     }
        // });
    });
</script>

</body>

</html>