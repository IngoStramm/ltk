document.addEventListener('DOMContentLoaded', function () {


});

window.addEventListener('load', function (event) {

    const applyMasks = function () {

        const fields = {
            '[name="billing_ddd"]': '(99)',
            '[name="billing_phone"]': '99999-9999',
            // '[name="billing_phone"]': '(99) 99999-9999',
            '[name="billing_cpf"]': '999.999.999-99',
            '[name="billing_cnpj"]': '99.999.999/9999-99',
            '[name="billing_ie"]': '9999999999-9',
            '[name="billing_postcode"]': '99999-999'
        };
        for (var key in fields) {
            if (Object.hasOwnProperty.call(fields, key)) {
                const mask_pattern = fields[key];
                if (document.querySelector(key) !== null) {
                    VMasker(document.querySelector(key)).maskPattern(mask_pattern);
                }
            }
        }
    };

    const removeJqueryMask = function () {
        const billing_phone = document.getElementById('billing_phone');
        if (typeof (billing_phone) !== undefined && billing_phone !== null) {
            jQuery('#billing_phone').unmask();
        }

    };

    const billing_persontype_select = function () {
        const billing_persontype = document.getElementById('select2-billing_persontype-container');
        if (typeof (billing_persontype) === undefined || billing_persontype === null) {
            return;
        }
        const billing_empresa_isenta_field = document.getElementById('billing_empresa_isenta_field');
        if (typeof (billing_empresa_isenta_field) === undefined || billing_empresa_isenta_field === null) {
            return;
        }
        setInterval(function () {

            if (billing_persontype.innerText === 'Pessoa Física') {
                billing_empresa_isenta_field.style.display = 'none';
            } else {
                billing_empresa_isenta_field.style.display = 'block';
            }
        }, 10);

    };
    removeJqueryMask();
    applyMasks();
    billing_persontype_select();
});