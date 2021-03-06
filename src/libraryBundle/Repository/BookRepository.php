<?php

namespace libraryBundle\Repository;

/**
* BookRepository
*
* This class was generated by the Doctrine ORM. Add your own custom
* repository methods below.
*/
class BookRepository extends \Doctrine\ORM\EntityRepository
{

  function findByCategories($categories){

    $query = $this->createQueryBuilder('a')
    ->select('a')
    ->leftJoin('a.categories', 'c')
    ->addSelect('c');

    $query = $query->add('where', $query->expr()->in('c', ':c'))
    ->setParameter('c', $categories)
    ->getQuery()
    ->getResult();

    return $query;
  }
}
