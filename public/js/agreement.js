var $collectionHolder;

// setup an "add a tag" link
var $addTagButton = $('<button type="button" class="genric-btn info circle text-uppercase add_child_link">Añadir hijo/a</button>');
var $newLinkLi = $('<div class="children"></div>').append($addTagButton);

jQuery(document).ready(function() {
    $partnerHomeUseHolder = $('select#request_agreement_partner_home_use').parent().parent().parent().parent();
    $partnerHomeUseSelect = $('select#request_agreement_partner_home_use');
    $custodyHolder = $('select#request_agreement_custody');
    $pickUpHolder = $('select#request_agreement_pick_up').parent().parent();
    $pickUpSelect = $('select#request_agreement_pick_up');
    $pickUpSchoolHolder = $('select#request_agreement_pick_up_school').parent().parent();
    $pickUpSchoolSelect = $('select#request_agreement_pick_up_school');
    $pickUpHomeHolder = $('select#request_agreement_pick_up_home').parent().parent();
    $pickUpHomeSelect = $('select#request_agreement_pick_up_home');
    $pickUpHourHolder = $('select#request_agreement_pick_up_hour').parent().parent();
    $pickUpHourSelect = $('select#request_agreement_pick_up_hour');
    $summerPeriodHolder = $('select#request_agreement_summer_period').parent().parent();
    $summerPeriodSelect = $('select#request_agreement_summer_period');
    $partnerSummerHolder = $('select#request_agreement_partner_summer').parent().parent();
    $partnerSummerSelect = $('select#request_agreement_partner_summer');
    $partnerHolyWeekHolder = $('select#request_agreement_partner_holy_week').parent().parent();
    $partnerHolyWeekSelect =  $('select#request_agreement_partner_holy_week')
    $partnerChristmasHolder = $('select#request_agreement_partner_christmas').parent().parent();
    $partnerChristmasSelect = $('select#request_agreement_partner_christmas');
    $partnerHolder = $('select#request_agreement_partner').parent().parent();
    $partnerSelect = $('select#request_agreement_partner');
    $debtorHolder = $('select#request_agreement_alimony_debtor').parent().parent().parent();
    $debtorSelect = $('select#request_agreement_alimony_debtor');
    $creditorHolder = $('input#request_agreement_alimony_creditor').parent().parent().parent();
    $creditorInput = $('input#request_agreement_alimony_creditor');
    $partnerFirstFirstNameField = $('input#request_marriage_partner_first_first_name');
    $partnerFirstLastNameField = $('input#request_marriage_partner_first_last_name');
    $partnerSecondFirstNameField = $('input#request_marriage_partner_second_first_name');
    $partnerSecondLastNameField = $('input#request_marriage_partner_second_last_name');
    $alimonySwitchHolder = $('#alimony-switch-holder').parent();
    $alimonyHolder = $('#alimony-holder').parent();
    $alimonyCheckbox = $('input#request_agreement_alimony_alimony');
    $amountHolder = $('input#request_agreement_alimony_amount').parent().parent().parent();
    $amountImput = $('input#request_agreement_alimony_amount');
    $pensionCheckbox = $('input#request_agreement_compensatory_pension_isPension');
    $pensionCreditorHolder = $('select#request_agreement_compensatory_pension_creditor').parent().parent().parent();
    $pensionCreditorSelect = $('select#request_agreement_compensatory_pension_creditor');
    $pensionAmountHolder = $('input#request_agreement_compensatory_pension_amount').parent().parent().parent();
    $pensionAmountInput = $('input#request_agreement_compensatory_pension_amount');
    $pensionLimitHolder = $('input#request_agreement_compensatory_pension_hasLimit').parent().parent().parent().parent();
    $pensionLimitCheckbox = $('input#request_agreement_compensatory_pension_hasLimit');
    $pensionTermHolder = $('input#request_agreement_compensatory_pension_term').parent().parent().parent();
    $pensionTermInput = $('input#request_agreement_compensatory_pension_term');
    $pensionTermTimeHolder = $('select#request_agreement_compensatory_pension_term_time').parent().parent().parent();
    $pensionTermTimeSelect = $('select#request_agreement_compensatory_pension_term_time');


    pickUpHide();
    pickUpSchoolHide();
    pickUpHomeHide();
    pickUpHourHide();
    summerPeriodHide();
    partnerSummerHide();
    partnerHolyWeekHide();
    partnerChristmasHide();
    alimonyFieldsHide();
    partnerHide();
    tooglePension();

    var selectedCustody = $custodyHolder.children("option:selected").val();
    toogleCustodyBlock(selectedCustody);

    $custodyHolder.change(function(){
        var selectedCustody = $(this).children("option:selected").val();
        toogleCustodyBlock(selectedCustody);
    });

    $pickUpSelect.change(function(){
        tooglePickUpOptions();
    });

    $partnerFirstFirstNameField.change(function(){
        changePartnerUseHomeOption(1, $(this).val() + ' ' + $partnerFirstLastNameField.val());
        changePartnerSummerOption(1, $(this).val() + ' ' + $partnerFirstLastNameField.val());
        changePartnerHolyWeekOption(1, $(this).val() + ' ' + $partnerFirstLastNameField.val());
        changePartnerChristmasOption(1, $(this).val() + ' ' + $partnerFirstLastNameField.val());
        changePartnerOption(1, $(this).val() + ' ' + $partnerFirstLastNameField.val());
        changeDebtorOption(1, $(this).val() + ' ' + $partnerFirstLastNameField.val());
        changePensionCreditorOption(1, $(this).val() + ' ' + $partnerFirstLastNameField.val())
    });

    $partnerFirstLastNameField.change(function(){
        changePartnerUseHomeOption(1, $partnerFirstFirstNameField.val() + ' ' + $(this).val());
        changePartnerSummerOption(1, $partnerFirstFirstNameField.val() + ' ' + $(this).val());
        changePartnerHolyWeekOption(1, $partnerFirstFirstNameField.val() + ' ' + $(this).val());
        changePartnerChristmasOption(1, $partnerFirstFirstNameField.val() + ' ' + $(this).val());
        changePartnerOption(1, $partnerFirstFirstNameField.val() + ' ' + $(this).val());
        changeDebtorOption(1, $partnerFirstFirstNameField.val() + ' ' + $(this).val());
        changePensionCreditorOption(1, $partnerFirstFirstNameField.val() + ' ' + $(this).val())
    });

    $partnerSecondFirstNameField.change(function(){
        changePartnerUseHomeOption(2, $(this).val() + ' ' + $partnerSecondLastNameField.val());
        changePartnerSummerOption(2, $(this).val() + ' ' + $partnerSecondLastNameField.val());
        changePartnerHolyWeekOption(2, $(this).val() + ' ' + $partnerSecondLastNameField.val());
        changePartnerChristmasOption(2, $(this).val() + ' ' + $partnerSecondLastNameField.val());
        changePartnerOption(2, $(this).val() + ' ' + $partnerSecondLastNameField.val());
        changeDebtorOption(2, $(this).val() + ' ' + $partnerSecondLastNameField.val());
        changePensionCreditorOption(2, $(this).val() + ' ' + $partnerSecondLastNameField.val())
    });

    $partnerSecondLastNameField.change(function(){
        changePartnerUseHomeOption(2, $partnerSecondFirstNameField.val() + ' ' + $(this).val());
        changePartnerSummerOption(2, $partnerSecondFirstNameField.val() + ' ' + $(this).val());
        changePartnerHolyWeekOption(2, $partnerSecondFirstNameField.val() + ' ' + $(this).val());
        changePartnerChristmasOption(2, $partnerSecondFirstNameField.val() + ' ' + $(this).val());
        changePartnerOption(2, $partnerSecondFirstNameField.val() + ' ' + $(this).val());
        changeDebtorOption(2, $partnerSecondFirstNameField.val() + ' ' + $(this).val());
        changePensionCreditorOption(2, $partnerSecondFirstNameField.val() + ' ' + $(this).val())
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

    $pensionCheckbox.change(function(){
        tooglePension();
    });

    $pensionLimitCheckbox.change(function(){
        if ($(this).is(":checked")){
            pensionTermShow();
            pensionTermTimeShow();
        }else{
            pensionTermHide();
            pensionTermTimeHide();
        }
    });

    function initPartnerFields(){
        changePartnerUseHomeOption(1, $partnerFirstFirstNameField.val() + ' ' + $partnerFirstLastNameField.val());
        changePartnerUseHomeOption(2, $partnerSecondFirstNameField.val() + ' ' + $partnerSecondLastNameField.val());
        changePartnerSummerOption(1, $partnerFirstFirstNameField.val() + ' ' + $partnerFirstLastNameField.val());
        changePartnerSummerOption(2, $partnerSecondFirstNameField.val() + ' ' + $partnerSecondLastNameField.val());
        changePartnerHolyWeekOption(1, $partnerFirstFirstNameField.val() + ' ' + $partnerFirstLastNameField.val());
        changePartnerHolyWeekOption(2, $partnerSecondFirstNameField.val() + ' ' + $partnerSecondLastNameField.val());
        changePartnerChristmasOption(1, $partnerFirstFirstNameField.val() + ' ' + $partnerFirstLastNameField.val());
        changePartnerChristmasOption(2, $partnerSecondFirstNameField.val() + ' ' + $partnerSecondLastNameField.val());
        changePartnerOption(1, $partnerFirstFirstNameField.val() + ' ' + $partnerFirstLastNameField.val());
        changePartnerOption(2, $partnerSecondFirstNameField.val() + ' ' + $partnerSecondLastNameField.val());
        changeDebtorOption(1, $partnerFirstFirstNameField.val() + ' ' + $partnerFirstLastNameField.val());
        changeDebtorOption(2, $partnerSecondFirstNameField.val() + ' ' + $partnerSecondLastNameField.val());
        changePensionCreditorOption(1, $partnerFirstFirstNameField.val() + ' ' + $partnerFirstLastNameField.val());
        changePensionCreditorOption(2, $partnerSecondFirstNameField.val() + ' ' + $partnerSecondLastNameField.val());
    }

    function changePartnerUseHomeOption(index, val){
        $partnerHomeUseSelect.find('option:eq('+index+')').text(val);
    }

    function changePartnerSummerOption(index, val){
        $partnerSummerSelect.find('option:eq('+index+')').text(val);
    }

    function changePartnerHolyWeekOption(index, val){
        $partnerHolyWeekSelect.find('option:eq('+index+')').text(val);
    }

    function changePartnerChristmasOption(index, val){
        $partnerChristmasSelect.find('option:eq('+index+')').text(val);
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

    function changePensionCreditorOption(index, val){
        $pensionCreditorSelect.find('option:eq('+index+')').text(val);
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
            changeCreditorField($partnerSecondFirstNameField.val() + ' ' + $partnerSecondLastNameField.val());
        }else if(val == 2){
            changeCreditorField($partnerFirstFirstNameField.val() + ' ' + $partnerFirstLastNameField.val());
        }else{
            changeCreditorField('');
        }
    }

    function setCreditorField(val){
        if(val == 1) {
            changeCreditorField($partnerFirstFirstNameField.val() + ' ' + $partnerFirstLastNameField.val());
        }else if(val == 2){
            changeCreditorField($partnerSecondFirstNameField.val() + ' ' + $partnerSecondLastNameField.val());
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

    function tooglePickUpOptions(){
        if($pickUpSelect.children("option:selected").val() == 1){
            pickUpSchoolShow();
            pickUpHomeHide();
            pickUpHourHide();
        }else if($pickUpSelect.children("option:selected").val() == 2){
            pickUpHomeShow();
            pickUpHourShow();
            pickUpSchoolHide();
        }else{
            pickUpSchoolHide();
            pickUpHomeHide();
            pickUpHourHide();
        }
    }

    function pickUpSchoolShow(){
        $pickUpSchoolHolder.show();
        $pickUpSchoolSelect.prop('required',true);
    }

    function pickUpSchoolHide(){
        $pickUpSchoolHolder.hide();
        $pickUpSchoolSelect.removeAttr('required');
    }

    function tooglePickUpSchool(){
        if($pickUpSchoolSelect.children("option:selected").val() == 2){
            pickUpSchoolShow();
        }else{
            pickUpSchoolHide();
        }
    }

    function pickUpHomeShow(){
        $pickUpHomeHolder.show();
        $pickUpHomeSelect.prop('required',true);
    }

    function pickUpHomeHide(){
        $pickUpHomeHolder.hide();
        $pickUpHomeSelect.removeAttr('required');
    }

    function tooglePickUpHome(){
        if($pickUpHomeSelect.children("option:selected").val() == 2){
            pickUpHomeShow();
        }else{
            pickUpHomeHide();
        }
    }

    function pickUpHourShow(){
        $pickUpHourHolder.show();
        $pickUpHourSelect.prop('required',true);
    }

    function pickUpHourHide(){
        $pickUpHourHolder.hide();
        $pickUpHourSelect.removeAttr('required');
    }

    function tooglePickUpHour(){
        if($pickUpSelect.children("option:selected").val() == 2){
            pickUpHourShow();
        }else{
            pickUpHourHide();
        }
    }

    function summerPeriodShow(){
        $summerPeriodHolder.show();
        $summerPeriodSelect.prop('required',true);
    }

    function summerPeriodHide(){
        $summerPeriodHolder.hide();
        $summerPeriodSelect.removeAttr('required');
    }

    function partnerSummerShow(){
        $partnerSummerHolder.show();
        $partnerSummerSelect.prop('required',true);
    }

    function partnerSummerHide(){
        $partnerSummerHolder.hide();
        $partnerSummerSelect.removeAttr('required');
    }

    function partnerHolyWeekShow(){
        $partnerHolyWeekHolder.show();
        $partnerHolyWeekSelect.prop('required',true);
    }

    function partnerHolyWeekHide(){
        $partnerHolyWeekHolder.hide();
        $partnerHolyWeekSelect.removeAttr('required');
    }

    function partnerChristmasShow(){
        $partnerChristmasHolder.show();
        $partnerChristmasSelect.prop('required',true);
    }

    function partnerChristmasHide(){
        $partnerChristmasHolder.hide();
        $partnerChristmasSelect.removeAttr('required');
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

    function pensionCreditorShow(){
        $pensionCreditorHolder.show();
        $pensionCreditorSelect.prop('required', true);
    }

    function pensionCreditorHide(){
        $pensionCreditorHolder.hide();
        $pensionCreditorSelect.removeAttr('required');
    }

    function pensionAmountShow(){
        $pensionAmountHolder.show();
        $pensionAmountInput.prop('required',true);
    }

    function pensionAmountHide(){
        $pensionAmountHolder.hide();
        $pensionAmountInput.removeAttr('required');
    }

    function pensionLimitShow(){
        $pensionLimitHolder.show();
    }

    function pensionLimitHide(){
        $pensionLimitHolder.hide();
    }

    function pensionTermShow(){
        $pensionTermHolder.show();
        $pensionTermInput.prop('required',true);
    }

    function pensionTermHide(){
        $pensionTermHolder.hide();
        $pensionTermInput.removeAttr('required');
    }

    function pensionTermTimeShow(){
        $pensionTermTimeHolder.show();
        $pensionTermTimeSelect.prop('required',true);
    }

    function pensionTermTimeHide(){
        $pensionTermTimeHolder.hide();
        $pensionTermTimeSelect.removeAttr('required');
    }

    function tooglePension(){
        if ($pensionCheckbox.is(":checked")){
            pensionCreditorShow();
            pensionAmountShow();
            pensionLimitShow();
            if($pensionLimitCheckbox.is(":checked")){
                pensionTermShow();
                pensionTermTimeShow();
            }else{
                pensionTermHide();
                pensionTermTimeHide();
            }
        }else{
            pensionCreditorHide();
            pensionAmountHide();
            pensionLimitHide();
            pensionTermHide();
            pensionTermTimeHide();
        }
    }

    function showCustodyBlockCompartida(){
        pickUpShow();
        tooglePickUpOptions();
        summerPeriodShow();
        partnerSummerShow();
        partnerHolyWeekShow();
        partnerChristmasShow();
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
        pickUpSchoolHide();
        pickUpHomeHide();
        pickUpHourHide();
        summerPeriodHide();
        partnerSummerHide();
        partnerHolyWeekHide();
        partnerChristmasHide();
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
        pickUpSchoolHide();
        pickUpHomeHide();
        pickUpHourHide();
        summerPeriodHide();
        partnerSummerHide();
        partnerHolyWeekHide();
        partnerChristmasHide();
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











        
    // Get the ul that holds the collection of tags
    $collectionHolder = $('div.children');

    // add a delete link to all of the existing tag form li elements
    // $collectionHolder.find('div.child').each(function(key, value) {
    //     //addTagFormDeleteLink($(this));
    // });

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    updateChildrenIndex();

    $addTagButton.on('click', function(e) {
        // add a new tag form (see next code block)
        addTagForm($collectionHolder, $newLinkLi);
    });

    $('div.remove button.genric-btn.danger-border.circle').on('click', function(e){
        $(this).parent().parent().parent().parent().remove();
        updateChildrenIndex();
    });

    function addTagForm($collectionHolder, $newLinkLi) {
        // Get the data-prototype explained earlier
        var prototype = $collectionHolder.data('prototype');

        // get the new index
        var index = $collectionHolder.data('index');

        var newForm = prototype;
        // You need this only if you didn't set 'label' => false in your tags field in TaskType
        // Replace '__name__label__' in the prototype's HTML to
        // instead be a number based on how many items we have
        // newForm = newForm.replace(/__name__label__/g, index);

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        newForm = newForm.replace(/__name__/g, index);

        // increase the index with one for the next item
        $collectionHolder.data('index', index + 1);

        // Display the form in the page in an li, before the "Add a tag" link li
        var $newFormLi = $('<div class="child"></div>').append(newForm);
        $newLinkLi.before($newFormLi);
        addTagFormDeleteLink($newFormLi);
        updateChildrenIndex();

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            language: 'es'
        });
    }

    function addTagFormDeleteLink($tagFormLi) {
        var $removeFormButton = $('<button type="button" class="genric-btn danger-border circle text-uppercase">Borrar hijo/a</button>');
        $tagFormLi.find('.remove').append($removeFormButton);

        $removeFormButton.on('click', function(e) {
            // remove the li for the tag form
            $tagFormLi.remove();
            updateChildrenIndex();
        });
    }

    function updateChildrenIndex(){
        $collectionHolder = $('div.children');
        $collectionHolder.find('div.child').each(function(key, value) {
            var currentValue = key + 1;
            $(this).find('.child_number').html('Hijo/a número ' + currentValue);
        });
        toogleChildrenBlocksHolder($collectionHolder.find('div.child').length);
    }

    function toogleChildrenBlocksHolder(value){
        $childrenBlocksHolder = $('#children-blocks-holder');
        if(value == 0){
            $childrenBlocksHolder.hide();
            hideCustodyBlockBoth();
        }else{
            $childrenBlocksHolder.show();
        }
    }
});