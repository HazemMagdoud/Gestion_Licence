<?php

namespace App\Processor;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class UserProcessor implements ProcessorInterface
{

    public function __construct(private readonly RequestStack $requestStack, private readonly EntityManagerInterface $em)
    {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        // TODO: Implement process() method.
        $payload = json_decode($this->requestStack->getCurrentRequest()->getContent(), true);
        if ($data instanceof Utilisateur) {
            $data->setNom($payload['nom']);
            $data->setEmail($payload['email']);
            $data->setPassword('');
            $data->setRoles(['ROLE_ADMIN']);
            $data->setPortable($payload['portable']);
            $data->setTelephone($payload['telephone']);
            $this->em->persist($data);
            $this->em->flush();
        }
        return $data;
    }
}