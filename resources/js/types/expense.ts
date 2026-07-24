type CategoryValue =
    | 'food'
    | 'transportation'
    | 'health'
    | 'entertainment'
    | 'subscriptions'
    | 'beauty'
    | 'clothing'
    | 'home'
    | 'education'
    | 'pets'
    | 'other';

export type Expense = {
    id: number
    name: string
    amount: string
    created_at: string
    category: CategoryValue
}