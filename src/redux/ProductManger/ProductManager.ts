import { createSlice } from '@reduxjs/toolkit'


type ItemsProps = {
    id:string
    name:string
    price:number,
    size:string
}

type initialStateProps = {
    products:ItemsProps[];
    selectedProducts:string[]
}

const initialState:initialStateProps = {
    products:[],
    selectedProducts:[],
}



export const productManager = createSlice({
  name: 'productmanager',
  initialState,
  reducers: {
     importItems: (state,{payload}) => {
         state.products = payload.products;
     },
     selectItems: (state,{payload}) => {
         if(!state.selectedProducts.includes(payload.id)){
            state.selectedProducts.push(payload.id);
         }
     },
     unselectItems: (state,{payload}) => {
        if(state.selectedProducts.includes(payload.id)){
            state.selectedProducts = state.selectedProducts.filter(product => {
                return payload.id !== product
            });
        }
     }
  },
})

export const {importItems,selectItems,unselectItems} = productManager.actions

export default productManager.reducer