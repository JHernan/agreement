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
    $partnerHolder = $('select#request_agreement_partner').parent().parent();

    $pickUpHolder.hide();
    $pickUpHourHolder.hide();
    $deliveryHolder.hide();
    $deliveryHourHolder.hide();
    $alternateWeeksHolder.hide();
    $partnerHolder.hide();

    $custodyHolder.change(function(){
        var selectedCustody = $(this).children("option:selected").val();
        if(selectedCustody == 1){
            $pickUpHolder.show();
            $deliveryHolder.show();
            $alternateWeeksHolder.show();
            $partnerHolder.hide();
        } else if(selectedCustody == 2){
            $pickUpHolder.hide();
            $pickUpHourHolder.hide();
            $deliveryHolder.hide();
            $deliveryHourHolder.hide();
            $alternateWeeksHolder.hide();
            $partnerHolder.show();
        } else{
            $pickUpHolder.hide();
            $pickUpHourHolder.hide();
            $deliveryHolder.hide();
            $deliveryHourHolder.hide();
            $alternateWeeksHolder.hide();
            $partnerHolder.hide();
        }
    });

    $pickUpSelect.change(function(){
        var selectedPickUp = $(this).children("option:selected").val();
        if(selectedPickUp == 2){
            $pickUpHourHolder.show();
        }else{
            $pickUpHourHolder.hide();
        }
    });

    $deliverySelect.change(function(){
        var selectedDelivery = $(this).children("option:selected").val();
        if(selectedDelivery == 2){
            $deliveryHourHolder.show();
        }else{
            $deliveryHourHolder.hide();
        }
    })
});