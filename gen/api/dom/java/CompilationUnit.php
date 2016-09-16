<?php

/**
 * Created by PhpStorm.
 * User: Beeant
 * Date: 2016/9/16
 * Time: 20:24
 */
interface CompilationUnit
{
    /**
     * Gets the formatted content.
     *
     * @return the formatted content
     */
    public function getFormattedContent();

    /**
     * Gets the imported types.
     *
     * @return the imported types
     */
    public function getImportedTypes();

    /**
     * Gets the static imports.
     *
     * @return the static imports
     */
    public function getStaticImports();

    /**
     * Gets the super class.
     *
     * @return the super class
     */
    public function getSuperClass();

    /**
     * Checks if is java interface.
     *
     * @return true, if is java interface
     */
    public function isJavaInterface();

    /**
     * Checks if is java enumeration.
     *
     * @return true, if is java enumeration
     */
    public function isJavaEnumeration();

    /**
     * Gets the super interface types.
     *
     * @return the super interface types
     */
    public function getSuperInterfaceTypes();

    /**
     * Gets the type.
     *
     * @return the type
     */
    public function getType();

    /**
     * Adds the imported type.
     *
     * @param importedType
     *            the imported type
     */
    public function addImportedType($importedType);

    /**
     * Adds the imported types.
     *
     * @param importedTypes
     *            the imported types
     */
    public function addImportedTypes($importedTypes);

    /**
     * Adds the static import.
     *
     * @param staticImport
     *            the static import
     */
    public function addStaticImport($staticImport);

    /**
     * Adds the static imports.
     *
     * @param staticImports
     *            the static imports
     */
    public function addStaticImports($staticImports);

    /**
     * Comments will be written at the top of the file as is, we do not append any start or end comment characters.
     *
     * Note that in the Eclipse plugin, file comments will not be merged.
     *
     * @param commentLine
     *            the comment line
     */
    public function addFileCommentLine($commentLine);

    /**
     * Gets the file comment lines.
     *
     * @return the file comment lines
     */
    public function getFileCommentLines();
}