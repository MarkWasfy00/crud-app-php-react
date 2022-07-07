import { configureStore } from '@reduxjs/toolkit';
import productReducer from './ProductManger/ProductManager';


export const store = configureStore({
  reducer: {
      productmanager:productReducer
  },
})


export type RootState  = ReturnType<typeof store.getState>
export type AppDispatch = typeof store.dispatch

