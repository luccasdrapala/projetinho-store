let tableSales, tableProducts, tableTypeProducts

function dateToDayMonthYear(strDate) {
    if (!strDate)
        return `00/00/0000`

    const dateFormatted = strDate.split('-')

	if (dateFormatted.length === 3) {
		return `${dateFormatted[2].substring(0, 2)}/${dateFormatted[1]}/${dateFormatted[0]}`
	}
}

function dateToYearMonthDay(strDate) {
    if (!strDate)
        return `0000-00-00`

	const dateFormatted = strDate.split('/')

	if (dateFormatted.length === 3) {
		return `${dateFormatted[2]}-${dateFormatted[1]}-${dateFormatted[0]}`
	}
}

function numberFormat(number = 0, decimals = 2) {
	return Number(number).toFixed(decimals).replace('.', ',')
}

function currencyToNumber(value) {

    if (!value) {
        value = 0;
    }

    if (value.length > 10) {
        return isNaN(value) == false ? parseFloat(value) : parseFloat(value.replace(".", "").replace(",", ".").replace(".", ""))
    }

	return isNaN(value) == false ? parseFloat(value) : parseFloat(value.replace(".", "").replace(",", "."))
}

$(document).ready(function() {
	$('.currency').inputmask('currency', {
		autoUnmask: true,
		radixPoint: ",",
		groupSeparator: ".",
		allowMinus: false,
		prefix: '',
		digits: 2,
		digitsOptional: false,
		rightAlign: true,
		unmaskAsNumber: true
	})

	$("select").select2()
})