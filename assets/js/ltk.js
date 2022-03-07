document.addEventListener('DOMContentLoaded', function () {
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
});

window.addEventListener('load', function (event) {
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

        // billing_persontype.addEventListener('change', function (ev) {
        //     console.log('changed');
        // });
    };

    billing_persontype_select();
});