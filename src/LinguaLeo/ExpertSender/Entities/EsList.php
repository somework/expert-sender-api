<?php

namespace LinguaLeo\ExpertSender\Entities;

class EsList
{
    private ?int $id = null;

    private ?string $name = null;

    private ?string $friendlyName = null;

    private ?string $language = null;
    private string $optInMod;

    public function __construct($id, $name, $friendlyName, $language, $optInMod)
    {
        $this
            ->setId($id)
            ->setName($name)
            ->setFriendlyName($friendlyName)
            ->setLanguage($language)
            ->setOptInMod($optInMod);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): static
    {
        $this->id = (int) $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): static
    {
        $this->name = (string) $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getFriendlyName()
    {
        return $this->friendlyName;
    }

    /**
     * @param string $friendlyName
     */
    public function setFriendlyName($friendlyName): static
    {
        $this->friendlyName = (string) $friendlyName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language): static
    {
        $this->language = (string) $language;

        return $this;
    }

    /**
     * @return string
     */
    public function getOptInMod()
    {
        return $this->optInMod;
    }

    /**
     * @param string $optInMod
     */
    public function setOptInMod($optInMod): static
    {
        $this->optInMod = (string) $optInMod;

        return $this;
    }
}
