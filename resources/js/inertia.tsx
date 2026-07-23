/// <reference types="vite/client" />
import { createInertiaApp } from '@inertiajs/react'

createInertiaApp({
    title: title => `CashTrackr - ${title}`,
    pages: {
        path: './Pages',
        extension: '.tsx',
    },
})