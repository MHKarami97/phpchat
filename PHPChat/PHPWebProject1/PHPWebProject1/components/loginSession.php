
<?php if(isset($_SESSION['successfull'])): ?>
<div class="alert alert_success">
    <?php echo $_SESSION['successfull']; ?>
</div>
<?php endif; ?>
<?php unset($_SESSION['successfull']); ?>

<?php if(isset($_SESSION['passwordChange'])): ?>
<div class="alert alert_success">
    <?php echo $_SESSION['passwordChange']; ?>
</div>
<?php endif; ?>
<?php unset($_SESSION['passwordChange']); ?>

<?php if(isset($_SESSION['nameChange'])): ?>
<div class="alert alert_success">
    <?php echo $_SESSION['nameChange']; ?>
</div>
<?php endif; ?>
<?php unset($_SESSION['nameChange']); ?>

<?php if(isset($_SESSION['imageChange'])): ?>
<div class="alert alert_success">
    <?php echo $_SESSION['imageChange']; ?>
</div>
<?php endif; ?>
<?php unset($_SESSION['imageChange']); ?>