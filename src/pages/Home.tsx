import { useEffect } from 'react';
import axios from 'axios';

import Card from '../components/Card';
import Navbar from '../components/Navbar';


import { useDispatch } from 'react-redux';
import { useAppSelector } from '../redux/Hooks/Hooks';
import { importItems } from '../redux/ProductManger/ProductManager';



function Home() {
  const dispatch = useDispatch();
  const products = useAppSelector((state) => state.productmanager.products)


  useEffect(() => {
    const fetchData = async () => {
      const data = await axios("http://localhost/php/index.php");
      const productsArray = await data.data;
      dispatch(importItems({products:productsArray}));
    }
    fetchData();
    
  },[])



  return (
    <main className="home">
      <Navbar />
      <div className="home__card-holder container">
        {
          products.map(product => {
            return <Card key={product.id} sku={product.id} name={product.name} price={product.price} property={product.size} />
          })
        }
      </div>
    </main>
  )
}

export default Home
