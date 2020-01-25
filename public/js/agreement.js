var $custodyHolder;
var $pickUpHolder;
var $alternateWeeksHolder;
var $partnerHolder;

jQuery(document).ready(function() {
    $custodyHolder = $('select#request_agreement_custody');

    $pickUpHolder = $('select#request_agreement_pick_up').parent().parent();
    $pickUpSelect = $('select#request_agreement_pick_up');
    $pickUpHourHolder = $('input#request_agreement_pick_up_hour').parent().parent();
    $deliveryHolder = $('select#request_agreement_delivery').parent().parent();
    $deliverySelect = $('select#request_agreement_delivery');
    $deliveryHourHolder = $('input#request_agreement_delivery_hour').parent().parent();
    $alternateWeeksHolder = $('input#request_agreement_alternate_weeks').parent().parent();
    $summerPeriodHolder = $('select#request_agreement_summer_period').parent().parent();
    $summerPeriodSelect = $('select#request_agreement_summer_period');
    $partnerHolder = $('select#request_agreement_partner').parent().parent();
    $partnerSelect = $('select#request_agreement_partner');
    $debtorSelect = $('select#request_agreement_alimony_debtor');
    $creditorInput = $('input#request_agreement_alimony_creditor');
    $partnerFirstField = $('input#request_marriage_partner_first_name');
    $partnerSecondField = $('input#request_marriage_partner_second_name');
    $alimonyHolder = $('#alimony-holder');

    $pickUpHolder.hide();
    $pickUpHourHolder.hide();
    $deliveryHolder.hide();
    $deliveryHourHolder.hide();
    $alternateWeeksHolder.hide();
    $summerPeriodHolder.hide();
    $alimonyHolder.hide();
    $partnerHolder.hide();

    var selectedCustody = $custodyHolder.children("option:selected").val();
    toogleCustodyBlock(selectedCustody);

    $custodyHolder.change(function(){
        var selectedCustody = $(this).children("option:selected").val();
        toogleCustodyBlock(selectedCustody);
    });

    $pickUpSelect.change(function(){
        var selectedPickUp = $(this).children("option:selected").val();
        if(selectedPickUp == "Monoparental"){
            $pickUpHourHolder.show();
        }else{
            $pickUpHourHolder.hide();
        }
    });

    $deliverySelect.change(function(){
        var selectedDelivery = $(this).children("option:selected").val();
        if(selectedDelivery == "Monoparental"){
            $deliveryHourHolder.show();
        }else{
            $deliveryHourHolder.hide();
        }
    });

    initPartnerFields();

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

    function initPartnerFields(){
        changePartnerOption(1, $partnerFirstField.val());
        changePartnerOption(2, $partnerSecondField.val());
        changeDebtorOption(1, $partnerFirstField.val());
        changeDebtorOption(2, $partnerSecondField.val());
        toogleCreditorField($debtorSelect.val());
    }

    function changePartnerOption(index, val){
        $partnerSelect.find('option:eq('+index+')').text(val);
    }

    function changeDebtorOption(index, val){
        $debtorSelect.find('option:eq('+index+')').text(val);
    }

    function changeCreditorOption(val){
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

    function toogleCreditorField(val){
        if(val == 1) {
            changeCreditorOption($partnerSecondField.val());
        }else if(val == 2){
            changeCreditorOption($partnerFirstField.val());
        }else{
            changeCreditorOption('');
        }
    }

    function showCustodyBlockCompartida(){
        $pickUpHolder.show();
        $deliveryHolder.show();
        $alternateWeeksHolder.show();
        $summerPeriodHolder.show();
        $alimonyHolder.show();
        $partnerHolder.hide();
    }

    function showCustodyBlockMonoparental(){
        $pickUpHolder.hide();
        $pickUpHourHolder.hide();
        $deliveryHolder.hide();
        $deliveryHourHolder.hide();
        $alternateWeeksHolder.hide();
        $summerPeriodHolder.hide();
        $alimonyHolder.hide();
        $partnerHolder.show();
    }

    function hideCustodyBlockBoth(){
        $pickUpHolder.hide();
        $pickUpHourHolder.hide();
        $deliveryHolder.hide();
        $deliveryHourHolder.hide();
        $alternateWeeksHolder.hide();
        $summerPeriodHolder.hide();
        $alimonyHolder.hide();
        $partnerHolder.hide();
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
});