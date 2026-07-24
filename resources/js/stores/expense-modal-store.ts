import type { Budget } from '../types/budget';
import { create } from 'zustand';
import { Category } from '../types/category';
import { Expense } from '../types/expense';
import { devtools } from 'zustand/middleware';

interface IExpenseModalStore {
    open: boolean;
    budget: Budget | null;
    expense: Expense | null;
    categories: Category[];
    openOrCloseModal: () => void;
    openEditModal: (expense: Expense) => void;
    setBudget: (budget: Budget) => void;
    setCategories: (categories: Category[]) => void;
}

export const useExpenseModalStore = create<IExpenseModalStore>()(devtools((set, get) => ({
    open: false,
    budget: null,
    expense: null,
    categories: [],
    openOrCloseModal: () => {
        set((state) => ({
            open: !state.open,
            expense: state.open ? null : state.expense,
        }));
    },
    openEditModal: (expense) => {
        set({
            open: true,
            expense
        })
    },
    setBudget: (budget) => {
        set({
            budget
        })
    },
    setCategories: (categories) => {
        set({
            categories
        })
    },
})));