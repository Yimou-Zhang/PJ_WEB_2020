<?php

$(".img-circle").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".img-circle").addClass("selected").html(fileName);
});

?>