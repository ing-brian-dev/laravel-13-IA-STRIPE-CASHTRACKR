import { formatCurrency } from "../utils";

type AmountDisplayProps = {
    label: string;
    amount: number;
}

export default function AmountDisplay({ label, amount }: AmountDisplayProps) {
    return (
        <p
            className="text-3xl font-bold text-purple-950"
        >
            {label} {''}
            <span
                className="font-black text-amber-500"
            >
                {formatCurrency(amount)}
            </span>
        </p>
    )
}
