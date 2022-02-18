document.addEventListener('DOMContentLoaded', function () {
    const fields = {
        '[name="billing_ddd"]': '(99)',
        '[name="billing_phone"]': '99999-9999',
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