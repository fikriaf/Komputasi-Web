<?php
$indicator = isset($_GET['indicator']) && $_GET['indicator'] === 'true';
if ($indicator) {
    $head = isset($_GET['head']) ? $_GET['head'] : 'Success';
    $text = isset($_GET['text']) ? $_GET['text'] : 'The proccess has been successed';
    $color = 'green';
} else {
    $head = isset($_GET['head']) ? $_GET['head'] : 'Failed';
    $text = isset($_GET['text']) ? $_GET['text'] : 'The proccess has been failed';
    $color = 'red';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.alert {
  padding: 20px;
  background-color: <?php echo $color ?>;
  color: white;
  position: fixed;
  top: 20px;
  right: 20px;
  z-index: 1000;
  border-radius: 5px;
  width: 300px;
  box-shadow: 0 0px 10px rgba(0, 0, 0, 0.1);
  animation: slide-in 0.5s ease-out forwards;
  overflow: hidden;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}

.progress-bar {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background-color: white !important;
}

.progress {
  height: 100%;
  background-color: <?php echo $color ?> !important;
  animation: reduce-width 3s linear forwards;
}

@keyframes slide-in {
  from {
    right: -100%;
  }
  to {
    right: 20px;
  }
}

@keyframes slide-out {
  from {
    right: 20px;
  }
  to {
    right: -100%;
  }
}

@keyframes reduce-width {
  from {
    width: 100%;
  }
  to {
    width: 0%;
  }
}
</style>
</head>
<body>

<div class="alert" id="alertBox">
    <span class="closebtn" onclick="closeAlert()">&times;</span> 
    <strong><?php echo htmlspecialchars($head); ?></strong>
    <br>
    <span><?php echo htmlspecialchars($text); ?></span>
    <!-- Progress Bar inside the alert -->
    <div class="progress-bar">
        <div class="progress"></div>
    </div>
</div>

<script>
    function closeAlert() {
        const alertBox = document.getElementById('alertBox');
        alertBox.style.animation = 'slide-out 0.5s ease forwards';
    }
    setTimeout(closeAlert, 3000);

    window.addEventListener('load', function() {
        const alertBox = document.getElementById('alertBox');
        alertBox.style.animation = 'slide-in 0.5s ease-out forwards';
    });
</script>

</body>
</html>
