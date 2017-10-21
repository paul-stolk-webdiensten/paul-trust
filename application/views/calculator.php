<?php
/**
 * Created by PhpStorm.
 * User: paulstolk
 * Date: 21-10-17
 * Time: 12:12:29
 */

$currencyOptions = array("a" => "a", "b" => "b");
$amount1FieldData = array(
    "name" => "amount1",
    "id" => "amount1",
    "value" => "1",
    "class" => "form-control"
);
$amount2FieldData = array(
    "name" => "amount2",
    "id" => "amount2",
    "value" => "0",
    "class" => "form-control",
    "readonly" => "readonly"
);

$buttonData = array(
        "type" => "button",
    "class" => "btn btn-primary",
    "id" => "convert",
    "content" => "Convert"
);
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>{page_title}</h1>
        </div>
    </div>
    <?php echo form_open('', array("id" => "calculate-form")); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <?php echo form_label('Select currency to convert from', 'currency1'); ?>
                <?php echo form_dropdown("currency1", $available_currencies, "EUR", array("id" => "currency1", "class" => "form-control")); ?>
            </div>
            <div class="form-group">
                <label for="currency2">Select currency to convert to</label>
                <?php echo form_dropdown("currency2", $available_currencies, "USD", array("id" => "currency2", "class" => "form-control")); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <label for="amount1">Amount to convert</label>
                <?php echo form_input($amount1FieldData); ?>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group convert-button">
                <?php echo form_button($buttonData); ?>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label for="currency2">Converted amount</label>
                <?php echo form_input($amount2FieldData); ?>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<script src="/assets/js/calculator.js?cache=<?php echo time(); ?>"></script>