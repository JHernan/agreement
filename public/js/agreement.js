jQuery(document).ready(function() {
    $custodyHolder = $('select#request_agreement_custody');

    $pickUpHolder = $('select#request_agreement_pick_up').parent().parent();
    $pickUpSelect = $('select#request_agreement_pick_up');
    // $pickUpHourHolder = $('input#request_agreement_pick_up_hour').parent().parent();
    $deliveryHolder = $('select#request_agreement_delivery').parent().parent();
    $deliverySelect = $('select#request_agreement_delivery');
    // $deliveryHourHolder = $('input#request_agreement_delivery_hour').parent().parent();
    $alternateWeeksHolder = $('input#request_agreement_alternate_weeks').parent().parent();
    $alternateWeeksInput = $('input#request_agreement_alternate_weeks');
    $summerPeriodHolder = $('select#request_agreement_summer_period').parent().parent();
    $summerPeriodSelect = $('select#request_agreement_summer_period');
    $partnerHolder = $('select#request_agreement_partner').parent().parent();
    $partnerSelect = $('select#request_agreement_partner');
    $debtorHolder = $('select#request_agreement_alimony_debtor').parent().parent().parent();
    $debtorSelect = $('select#request_agreement_alimony_debtor');
    $creditorHolder = $('input#request_agreement_alimony_creditor').parent().parent().parent();
    $creditorInput = $('input#request_agreement_alimony_creditor');
    $partnerFirstField = $('input#request_marriage_partner_first_name');
    $partnerSecondField = $('input#request_marriage_partner_second_name');
    $alimonySwitchHolder = $('#alimony-switch-holder').parent();
    $alimonyHolder = $('#alimony-holder').parent();
    $alimonyCheckbox = $('input#request_agreement_alimony_alimony');
    $amountHolder = $('input#request_agreement_alimony_amount').parent().parent().parent();
    $amountImput = $('input#request_agreement_alimony_amount');


    $pickUpHolder.hide();
    // $pickUpHourHolder.hide();
    $deliveryHolder.hide();
    // $deliveryHourHolder.hide();
    $alternateWeeksHolder.hide();
    $summerPeriodHolder.hide();
    $alimonyHolder.hide();
    partnerHide();

    var selectedCustody = $custodyHolder.children("option:selected").val();
    toogleCustodyBlock(selectedCustody);

    $custodyHolder.change(function(){
        var selectedCustody = $(this).children("option:selected").val();
        toogleCustodyBlock(selectedCustody);
    });

    $pickUpSelect.change(function(){
        var selectedPickUp = $(this).children("option:selected").val();
        if(selectedPickUp == "Monoparental"){
            // $pickUpHourHolder.show();
        }else{
            // $pickUpHourHolder.hide();
        }
    });

    $deliverySelect.change(function(){
        var selectedDelivery = $(this).children("option:selected").val();
        if(selectedDelivery == "Monoparental"){
            // $deliveryHourHolder.show();
        }else{
            // $deliveryHourHolder.hide();
        }
    });

    $partnerFirstField.change(function(){
        changePartnerOption(1, $(this).val());
        changeDebtorOption(1, $(this).val());
    });

    $partnerSecondField.change(function(){
        changePartnerOption(2, $(this).val());
        changeDebtorOption(2, $(this).val());
    });

    $debtorSelect.change(function(){
        toogleCreditorField($(this).val());
    });

    $partnerSelect.change(function(){
        setCreditorField($(this).val());
        toogleDebtorField($(this).val());
    });

    $alimonyCheckbox.change(function(){
        if ($(this).is(":checked")){
            amountShow();
            debtorShow();
            creditorShow();
        }else{
            amountHide();
            debtorHide();
            creditorHide();
        }
    });

    function initPartnerFields(){
        changePartnerOption(1, $partnerFirstField.val());
        changePartnerOption(2, $partnerSecondField.val());
        changeDebtorOption(1, $partnerFirstField.val());
        changeDebtorOption(2, $partnerSecondField.val());
    }

    function changePartnerOption(index, val){
        $partnerSelect.find('option:eq('+index+')').text(val);
    }

    function changeDebtorOption(index, val){
        $debtorSelect.find('option:eq('+index+')').text(val);
    }

    function changeCreditorField(val){
        $creditorInput.val(val);
    }

    function toogleCustodyBlock(selectedCustody){
        if(selectedCustody == "Compartida"){
            showCustodyBlockCompartida();
        } else if(selectedCustody == "Monoparental"){
            showCustodyBlockMonoparental();
        } else{
            hideCustodyBlockBoth();
        }
    }

    function toogleDebtorField(val){
        if(val == 1){
            val = 2;
        }else{
            val = 1;
        }
        $debtorSelect.find('option:selected').prop("selected", false);
        $debtorSelect.find('option[value='+val+']').prop('selected', true);
    }

    function toogleCreditorField(val){
        if(val == 1) {
            changeCreditorField($partnerSecondField.val());
        }else if(val == 2){
            changeCreditorField($partnerFirstField.val());
        }else{
            changeCreditorField('');
        }
    }

    function setCreditorField(val){
        if(val == 1) {
            changeCreditorField($partnerFirstField.val());
        }else if(val == 2){
            changeCreditorField($partnerSecondField.val());
        }else{
            changeCreditorField('');
        }
    }

    function disabledDebtorField(disabled){
        if(disabled){
            $debtorSelect.attr("disabled", "disabled");
        }else{
            $debtorSelect.removeAttr("disabled");
        }
    }

    function pickUpShow(){
        $pickUpHolder.show();
        $pickUpSelect.prop('required',true);
    }

    function pickUpHide(){
        $pickUpHolder.hide();
        $pickUpSelect.removeAttr('required');
    }

    function deliveryShow(){
        $deliveryHolder.show();
        $deliverySelect.prop('required',true);
    }

    function deliveryHide(){
        $deliveryHolder.hide();
        $deliverySelect.removeAttr('required');
    }

    function alternateWeeksShow(){
        $alternateWeeksHolder.show();
        $alternateWeeksInput.prop('required',true);
    }

    function alternateWeeksHide() {
        $alternateWeeksHolder.hide();
        $alternateWeeksInput.removeAttr('required');
    }

    function summerPeriodShow(){
        $summerPeriodHolder.show();
        $summerPeriodSelect.prop('required',true);
    }

    function summerPeriodHide(){
        $summerPeriodHolder.hide();
        $summerPeriodSelect.removeAttr('required');
    }

    function partnerShow(){
        $partnerHolder.show();
        $partnerSelect.prop('required',true);
    }

    function partnerHide(){
        $partnerHolder.hide();
        $partnerSelect.removeAttr('required');
    }

    function amountShow(){
        $amountHolder.show();
        $amountImput.prop('required',true);
    }

    function amountHide(){
        $amountHolder.hide();
        $amountImput.removeAttr('required');
    }

    function debtorShow(){
        $debtorHolder.show();
        $debtorSelect.prop('required', true);
    }

    function debtorHide(){
        $debtorHolder.hide();
        $debtorSelect.removeAttr('required');
    }

    function creditorShow(){
        $creditorHolder.show();
        $creditorInput.prop('required', true);
    }

    function creditorHide(){
        $creditorHolder.hide();
        $creditorInput.removeAttr('required');
    }

    function alimonyFieldsShow(){
        amountShow();
        debtorShow();
        creditorShow();
    }

    function alimonyFieldsHide(){
        amountHide();
        debtorHide();
        creditorHide();
    }

    function showCustodyBlockCompartida(){
        pickUpShow();
        deliveryShow();
        alternateWeeksShow();
        summerPeriodShow();
        $alimonyHolder.show();
        $alimonySwitchHolder.show();
        if($alimonyCheckbox.is(":checked")){
            alimonyFieldsShow();
        }else{
            alimonyFieldsHide();
        }
        disabledDebtorField(false);
        partnerHide();
        initPartnerFields();
        toogleCreditorField($debtorSelect.val());
    }

    function showCustodyBlockMonoparental(){
        pickUpHide();
        deliveryHide();
        alternateWeeksHide();
        summerPeriodHide();
        // $pickUpHourHolder.hide();
        // $deliveryHourHolder.hide();
        $alimonyHolder.show();
        $alimonySwitchHolder.hide();
        alimonyFieldsShow();
        disabledDebtorField(true);
        partnerShow();
        initPartnerFields();
        toogleDebtorField($partnerSelect.val());
        setCreditorField($partnerSelect.val());
    }

    function hideCustodyBlockBoth(){
        pickUpHide();
        deliveryHide();
        alternateWeeksHide();
        summerPeriodHide();
        // $pickUpHourHolder.hide();
        // $deliveryHourHolder.hide();
        $alimonyHolder.hide();
        $alimonySwitchHolder.hide();
        alimonyFieldsHide();
        partnerHide();
    }


    $.fn.datepicker.dates['es'] = {
        days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
        daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        today: "Hoy",
        clear: "Limpiar",
        format: "mm/dd/yyyy",
        titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
        weekStart: 1
    };
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        language: 'es'
    });

    $('form').bind('submit', function(){
        $debtorSelect.prop('disabled', false);
    });
});