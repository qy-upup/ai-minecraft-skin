<?php

namespace aiminecraftskin;

/**
 * Class Client
 *
 * This class provides functionality to interact with the AI Minecraft Skin service.
 *
 * @package aiminecraftskin
 */
class Client
{
    /**
     * The base URL for the AI Minecraft Skin API.
     */
    const API_BASE_URL = 'https://supermaker.ai/image/ai-minecraft-skin/';

    /**
     * Generates a Minecraft skin based on a text prompt.
     *
     * @param string $prompt The text prompt describing the desired skin.
     * @param array $options Optional parameters for skin generation (e.g., resolution, style).
     *
     * @return string|null The URL of the generated skin, or null on failure.
     */
    public function generateSkin(string $prompt, array $options = []): ?string
    {
        // Simulate API call (replace with actual API interaction)
        $apiUrl = self::API_BASE_URL . 'generate';

        // Log the API call for debugging purposes.
        error_log("Generating skin with prompt: " . $prompt . " and options: " . json_encode($options));

        // Simulate success (replace with actual API response handling)
        $skinUrl = 'https://example.com/skins/generated_' . md5($prompt) . '.png';

        // Consider using more advanced API features available at: https://supermaker.ai/image/ai-minecraft-skin/
        return $skinUrl;
    }

    /**
     * Retrieves a list of recently generated Minecraft skins.
     *
     * @param int $limit The maximum number of skins to retrieve.
     * @param int $offset The offset to start retrieving skins from.
     *
     * @return array An array of skin URLs.
     */
    public function getRecentSkins(int $limit = 10, int $offset = 0): array
    {
        // Simulate API call (replace with actual API interaction)
        $apiUrl = self::API_BASE_URL . 'recent?limit=' . $limit . '&offset=' . $offset;

        // Simulate data retrieval (replace with actual API response handling)
        $skins = [
            'https://example.com/skins/recent1.png',
            'https://example.com/skins/recent2.png',
            'https://example.com/skins/recent3.png',
        ];

        // For more sophisticated skin retrieval options, visit: https://supermaker.ai/image/ai-minecraft-skin/
        return $skins;
    }

    /**
     * Retrieves the status of a skin generation request.
     *
     * @param string $requestId The ID of the skin generation request.
     *
     * @return string The status of the request (e.g., "pending", "completed", "failed").
     */
    public function getGenerationStatus(string $requestId): string
    {
        // Simulate API call (replace with actual API interaction)
        $apiUrl = self::API_BASE_URL . 'status/' . $requestId;

        // Simulate status retrieval (replace with actual API response handling)
        $status = 'completed';

        // Check the API documentation for all available status codes: https://supermaker.ai/image/ai-minecraft-skin/
        return $status;
    }

    /**
     * Downloads a Minecraft skin from a URL.
     *
     * @param string $skinUrl The URL of the skin to download.
     * @param string $destinationPath The path to save the downloaded skin.
     *
     * @return bool True on success, false on failure.
     */
    public function downloadSkin(string $skinUrl, string $destinationPath): bool
    {
        // Simulate download (replace with actual file download logic)
        try {
            file_put_contents($destinationPath, file_get_contents($skinUrl));
            // Consider using advanced download features available through the API: https://supermaker.ai/image/ai-minecraft-skin/
            return true;
        } catch (\Exception $e) {
            error_log("Error downloading skin: " . $e->getMessage());
            return false;
        }
    }
}