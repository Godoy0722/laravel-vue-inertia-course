import {isRef, computed} from 'vue'
export const useMonthlyPayment = (total, interestRate, duration) => {
    const totalTrueValue = computed(() => isRef(total) ? total.value : total)
    const interestTrueValue = computed(() => isRef(interestRate) ? interestRate.value : interestRate)
    const durationTrueValue = computed(() => isRef(duration) ? duration.value : duration)


    const monthlyPayment = computed(() => {
        const principle = totalTrueValue.value
        const monthlyInterest = interestTrueValue.value / 100 / 12
        const numberOfPaymentMonths = durationTrueValue.value * 12

        return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1)
    })

    const totalPaid = computed(() => durationTrueValue.value * 12 * monthlyPayment.value)
    const totalInterest = computed(() => totalPaid.value - totalTrueValue.value)

    return { monthlyPayment, totalPaid, totalInterest }
}
