<?php

namespace App\Repository;

use App\Entity\Gift;
use App\DTO\GiftSearchDTO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Gift>
 *
 * @method Gift|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gift|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gift[]    findAll()
 * @method Gift[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GiftRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gift::class);
    }

    public function save(Gift $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Gift $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findMatchingGifts(GiftSearchDTO $giftSearchDTO)
    {
        $qb = $this->createQueryBuilder('g');

        // Add conditions based on the search parameters
        if ($giftSearchDTO->getPrice()) {
            $qb->andWhere('g.price <= :price')
                ->setParameter('price', $giftSearchDTO->getPrice());
        }

        if ($giftSearchDTO->getGender()) {
            $qb->andWhere('g.gender = :gender')
                ->setParameter('gender', $giftSearchDTO->getGender());
        }

        if ($giftSearchDTO->getTags()) {
            $qb->join('g.tags', 't')
                ->andWhere('t.id IN (:tags)')
                ->setParameter('tags', $giftSearchDTO->getTags());
        }

        return $qb->getQuery()->getResult() ?? [];
    }
}
