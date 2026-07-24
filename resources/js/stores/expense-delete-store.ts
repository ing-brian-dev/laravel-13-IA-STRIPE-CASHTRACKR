import { create } from 'zustand'
import { Expense } from '../types/expense'


type Store = {
  open: boolean
  expense: Expense | null
  openModal: (expense: Expense) => void
  closeModal: () => void
}

export const useDeleteExpenseStore = create<Store>((set) => ({
  open: false,
  expense: null,
  openModal: (expense) =>
    set({
      open: true,
      expense,
    }),
  closeModal: () => {
    set({ open: false })
    setTimeout(() => {
      set({ expense: null })
    }, 200)
  }
}))