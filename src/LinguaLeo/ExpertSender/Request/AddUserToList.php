<?php

namespace LinguaLeo\ExpertSender\Request;

use BadMethodCallException;
use LinguaLeo\ExpertSender\Entities\Property;
use LinguaLeo\ExpertSender\ExpertSenderEnum;

/**
 * Represents adding subscriber to list request attributes.
 *
 * https://sites.google.com/a/expertsender.com/api-documentation/methods/subscribers/add-subscriber#TOC-Request-data-format
 */
class AddUserToList
{
    private bool $frozen = false;

    private ?int $listId = null;

    private ?int $id = null;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $firstName;

    /**
     * @var string|null
     */
    private $lastName;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $ip;

    /**
     * @var string|null
     */
    private $trackingCode;

    /**
     * @var string|null
     */
    private $vendor;

    private bool $force = false;

    private string $mode = ExpertSenderEnum::MODE_ADD_AND_UPDATE;

    private array $properties = [];

    /**
     * @var string|null
     */
    private $phone;

    /**
     * @var string|null
     */
    private $customSubscriberId;

    public function isValid(): bool
    {
        return null !== $this->email && null !== $this->listId;
    }

    /**
     * @return bool
     */
    public function isFrozen()
    {
        return $this->frozen;
    }

    /**
     * @throws BadMethodCallException
     */
    public function freeze(): static
    {
        if (!$this->isValid()) {
            throw new BadMethodCallException('AddUserToListRequest cannot be frozen when is invalid.');
        }

        $this->frozen = true;

        return $this;
    }

    /**
     * @param int|null $listId
     *
     * @throws BadMethodCallException
     */
    public function setListId($listId = null): static
    {
        $this->exceptionIfFrozen();

        $this->listId = null === $listId ? null : (int) $listId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getListId()
    {
        return $this->listId;
    }

    /**
     * @param int|string|null $id
     *
     * @throws BadMethodCallException
     */
    public function setId(int|string|null $id = null): static
    {
        $this->exceptionIfFrozen();

        $this->id = null === $id ? null : (int) $id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string|null $email
     *
     * @throws BadMethodCallException
     */
    public function setEmail($email = null): static
    {
        $this->exceptionIfFrozen();

        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string|null $firstName
     *
     * @throws BadMethodCallException
     */
    public function setFirstName($firstName = null): static
    {
        $this->exceptionIfFrozen();

        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string|null $lastName
     *
     * @throws BadMethodCallException
     */
    public function setLastName($lastName = null): static
    {
        $this->exceptionIfFrozen();

        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string|null $name
     *
     * @throws BadMethodCallException
     */
    public function setName($name = null): static
    {
        $this->exceptionIfFrozen();

        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string|null $ip
     *
     * @throws BadMethodCallException
     */
    public function setIp($ip = null): static
    {
        $this->exceptionIfFrozen();

        $this->ip = $ip;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string|null $trackingCode
     *
     * @throws BadMethodCallException
     * @throws \InvalidArgumentException
     */
    public function setTrackingCode($trackingCode = null): static
    {
        $this->exceptionIfFrozen();

        if ($trackingCode !== null && strlen($trackingCode) > 20) {
            throw new \InvalidArgumentException('Tracking code is too long, max is 20 characters');
        }

        $this->trackingCode = $trackingCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTrackingCode()
    {
        return $this->trackingCode;
    }

    /**
     * @param string|null $vendor
     *
     * @throws BadMethodCallException
     */
    public function setVendor($vendor = null): static
    {
        $this->exceptionIfFrozen();

        $this->vendor = $vendor;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * @param bool $force
     *
     * @throws BadMethodCallException
     * @throws \InvalidArgumentException
     */
    public function setForce($force): static
    {
        $this->exceptionIfFrozen();

        if (!is_bool($force)) {
            throw new \InvalidArgumentException();
        }

        $this->force = $force;

        return $this;
    }

    /**
     * @return bool
     */
    public function getForce()
    {
        return $this->force;
    }

    /**
     *
     * @throws BadMethodCallException
     * @throws \InvalidArgumentException
     *
     */
    public function setMode(string $mode): static
    {
        $this->exceptionIfFrozen();

        if (!in_array($mode, ExpertSenderEnum::getModes(), true)) {
            throw new \InvalidArgumentException('Invalid mode: '.$mode);
        }

        $this->mode = $mode;

        return $this;
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string|null $phone
     *
     * @throws BadMethodCallException
     */
    public function setPhone($phone = null): static
    {
        $this->exceptionIfFrozen();
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string|null $customSubscriberId
     *
     * @throws BadMethodCallException
     */
    public function setCustomSubscriberId($customSubscriberId = null): static
    {
        $this->exceptionIfFrozen();
        $this->customSubscriberId = $customSubscriberId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomSubscriberId()
    {
        return $this->customSubscriberId;
    }

    /**
     *
     * @throws BadMethodCallException
     *
     */
    public function addProperty(Property $property): static
    {
        $this->exceptionIfFrozen();

        $this->properties[] = $property;

        return $this;
    }

    /**
     *
     * @throws BadMethodCallException
     *
     */
    public function setProperties(array $properties): static
    {
        $this->exceptionIfFrozen();

        $this->properties = [];

        foreach ($properties as $property) {
            $this->addProperty($property);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @throws BadMethodCallException
     */
    private function exceptionIfFrozen(): void
    {
        if ($this->frozen) {
            throw new BadMethodCallException('Attributes cannot be set when AddUserToListRequest is frozen.');
        }
    }
}
