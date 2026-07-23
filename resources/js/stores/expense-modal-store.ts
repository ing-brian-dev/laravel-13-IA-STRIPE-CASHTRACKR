import { create } from 'zustand';

interface IExpenseModalStore {
    open: boolean;
    openOrCloseModal: () => void;
}

export const useExpenseModalStore = create<IExpenseModalStore>((set, get) => ({
    open: false,
    openOrCloseModal: () => {
        set({
            open: !get().open, // Get the opening value and invert it with !
        });
    }
}));