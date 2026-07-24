
export function formatDate(date: string): string {
    return new Intl.DateTimeFormat('es-MX', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    }).format(new Date(date))
}

export function formatCurrency(amount: number) {
    return Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD'
    }).format(amount);
}