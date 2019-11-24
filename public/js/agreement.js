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

    $pickUpHolder.hide();
    $pickUpHourHolder.hide();
    $deliveryHolder.hide();
    $deliveryHourHolder.hide();
    $alternateWeeksHolder.hide();
    $summerPeriodHolder.hide();
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

    function toogleCustodyBlock(selectedCustody){
        if(selectedCustody == "Compartida"){
            showCustodyBlockCompartida();
        } else if(selectedCustody == "Monoparental"){
            showCustodyBlockMonoparental();
        } else{
            hideCustodyBlock();
        }
    }

    function showCustodyBlockCompartida(){
        $pickUpHolder.show();
        $deliveryHolder.show();
        $alternateWeeksHolder.show();
        $summerPeriodHolder.show();
        $partnerHolder.hide();
    }

    function showCustodyBlockMonoparental(){
        $pickUpHolder.hide();
        $pickUpHourHolder.hide();
        $deliveryHolder.hide();
        $deliveryHourHolder.hide();
        $alternateWeeksHolder.hide();
        $summerPeriodHolder.hide();
        $partnerHolder.show();
    }

    function hideCustodyBlock(){
        $pickUpHolder.hide();
        $pickUpHourHolder.hide();
        $deliveryHolder.hide();
        $deliveryHourHolder.hide();
        $alternateWeeksHolder.hide();
        $summerPeriodHolder.hide();
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