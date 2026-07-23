import type { Budget } from '../types/budget';
import { create } from 'zustand';
import { Category } from '../types/category';

interface IExpenseModalStore {
    open: boolean;
    budget: Budget | null;
    categories: Category[];
    openOrCloseModal: () => void;
    setBudget: (budget: Budget) => void;
    setCategories: (categories : Category[]) => void;
}

export const useExpenseModalStore = create<IExpenseModalStore>((set, get) => ({
    open: false,
    budget: null,
    categories: [],
    openOrCloseModal: () => {
        set({
            open: !get().open, // Get the opening value and invert it with !
        });
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
}));