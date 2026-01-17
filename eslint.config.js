import js from "@eslint/js";
import globals from "globals";
import pluginReact from "eslint-plugin-react";
import reactHooks from "eslint-plugin-react-hooks";
import reactRefresh from "eslint-plugin-react-refresh";
import eslintPluginPrettier from "eslint-plugin-prettier/recommended";
import eslintConfigPrettier from "eslint-config-prettier/flat";
import { defineConfig } from "eslint/config";

export default defineConfig([
    { ignores: ["dist"] },
    {
        files: ["**/*.{js,mjs,cjs,jsx}"],
        plugins: { js, reactHooks, reactRefresh },
        extends: ["js/recommended"],
        languageOptions: {
            ...pluginReact.configs.flat.recommended.languageOptions,
            parserOptions: {
                ecmaFeatures: {
                    jsx: true,
                },
            },
            globals: globals.browser,
        },
        rules: {
            ...reactHooks.configs.recommended.rules,
        },
    },
    pluginReact.configs.flat.recommended,
    reactPlugin.configs.flat["jsx-runtime"],
    eslintPluginPrettier,
    eslintConfigPrettier,
]);
